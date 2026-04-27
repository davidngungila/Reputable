@extends('layouts.admin')

@section('title', 'Advanced Pricing Management')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header with Statistics -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Advanced Pricing</h1>
            <p class="text-gray-600">Comprehensive tour pricing management system</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <button onclick="exportPricing()" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-download mr-2"></i>Export Data
            </button>
            <button onclick="importPricing()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-upload mr-2"></i>Import Data
            </button>
            <button onclick="showAnalytics()" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-chart-line mr-2"></i>Analytics
            </button>
        </div>
    </div>

    <!-- Statistics Dashboard -->
    <div id="stats-dashboard" class="hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Tours</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1" id="total-tours">0</p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-backpack text-emerald-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Available Days</p>
                    <p class="text-2xl font-bold text-emerald-600 mt-1" id="available-days">0</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-calendar-check text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Avg. Price</p>
                    <p class="text-2xl font-bold text-blue-600 mt-1" id="avg-price">$0</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-currency-dollar text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Occupancy Rate</p>
                    <p class="text-2xl font-bold text-purple-600 mt-1" id="occupancy-rate">0%</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-chart-pie text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Tour Selection and Quick Actions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <label for="tour-selector" class="block text-sm font-semibold text-gray-700 mb-2">Select Tour</label>
                <select id="tour-selector" onchange="loadTourAvailability()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">Choose a tour to manage...</option>
                    @foreach($tours ?? [] as $tour)
                    <option value="{{ $tour->id }}">{{ $tour->name }} ({{ $tour->duration_days }} days) - ${{ number_format($tour->base_price, 0) }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="flex items-end gap-3">
                <button onclick="showBulkUpdate()" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                    <i class="ph-bold ph-pencil mr-2"></i>Bulk Update
                </button>
                <button onclick="syncCalendar()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                    <i class="ph-bold ph-arrow-clockwise mr-2"></i>Sync
                </button>
            </div>
        </div>
        
        <!-- Tour Overview (Hidden initially) -->
        <div id="tour-overview" class="hidden mt-6 pt-6 border-t border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-emerald-50 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ph-bold ph-backpack text-emerald-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Tour Name</p>
                            <p class="font-semibold text-gray-900" id="selected-tour-name">-</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ph-bold ph-calendar text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Duration</p>
                            <p class="font-semibold text-gray-900" id="selected-tour-duration">-</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-purple-50 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ph-bold ph-map-pin text-purple-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Location</p>
                            <p class="font-semibold text-gray-900" id="selected-tour-location">-</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-orange-50 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ph-bold ph-currency-dollar text-orange-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Base Price</p>
                            <p class="font-semibold text-gray-900" id="selected-tour-price">-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tour Details Panel -->
    <div id="tour-details" class="hidden">
        <!-- Pricing Controls -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <div class="flex items-center mb-6">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="ph-bold ph-sliders text-purple-600 text-xl"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Pricing Controls</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Seasonal Multiplier</label>
                    <select id="seasonal-multiplier" onchange="updateSeasonalPricing()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="1.0">🌤️ Standard (1.0x)</option>
                        <option value="1.2">☀️ Peak Season (1.2x)</option>
                        <option value="1.5">🔥 High Season (1.5x)</option>
                        <option value="0.8">❄️ Low Season (0.8x)</option>
                        <option value="0.6">🌧️ Off Season (0.6x)</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Group Discount</label>
                    <div class="flex items-center gap-2">
                        <input type="number" id="group-discount" min="0" max="50" step="5" value="0" onchange="updateGroupPricing()"
                               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                               placeholder="0%">
                        <span class="text-sm text-gray-600">%</span>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Max Group Size</label>
                    <input type="number" id="max-group-size" min="1" max="50" value="20" onchange="updateAvailability()"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Min. Booking</label>
                    <input type="number" id="min-booking" min="1" max="20" value="2" onchange="updateMinBooking()"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>
            
            <!-- Dynamic Pricing Rules -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Dynamic Pricing Rules</h3>
                    <button onclick="addPricingRule()" class="px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors text-sm font-medium">
                        <i class="ph-bold ph-plus mr-1"></i>Add Rule
                    </button>
                </div>
                
                <div id="pricing-rules" class="space-y-3">
                    <!-- Pricing rules will be added here -->
                </div>
            </div>
        </div>

        <!-- Calendar View -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-calendar text-blue-600 text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Availability Calendar</h2>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex gap-2">
                        <button onclick="previousMonth()" class="p-2 text-gray-600 hover:text-gray-900 rounded-lg hover:bg-gray-100 transition-colors">
                            <i class="ph-bold ph-caret-left"></i>
                        </button>
                        <span id="current-month" class="text-sm font-medium text-gray-700 px-3 py-1 bg-gray-100 rounded-lg">Month Year</span>
                        <button onclick="nextMonth()" class="p-2 text-gray-600 hover:text-gray-900 rounded-lg hover:bg-gray-100 transition-colors">
                            <i class="ph-bold ph-caret-right"></i>
                        </button>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="setView('month')" id="month-view-btn" class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg transition-colors text-sm font-medium">Month</button>
                        <button onclick="setView('week')" id="week-view-btn" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg transition-colors text-sm font-medium">Week</button>
                        <button onclick="setView('day')" id="day-view-btn" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg transition-colors text-sm font-medium">Day</button>
                    </div>
                </div>
            </div>

            <!-- Calendar Grid -->
            <div class="bg-gray-50 rounded-lg p-4">
                <div class="grid grid-cols-7 gap-2 mb-2">
                    <div class="text-center text-xs font-semibold text-gray-600">Sun</div>
                    <div class="text-center text-xs font-semibold text-gray-600">Mon</div>
                    <div class="text-center text-xs font-semibold text-gray-600">Tue</div>
                    <div class="text-center text-xs font-semibold text-gray-600">Wed</div>
                    <div class="text-center text-xs font-semibold text-gray-600">Thu</div>
                    <div class="text-center text-xs font-semibold text-gray-600">Fri</div>
                    <div class="text-center text-xs font-semibold text-gray-600">Sat</div>
                </div>
                <div id="calendar-grid" class="grid grid-cols-7 gap-2">
                    <!-- Calendar days will be generated here -->
                </div>
            </div>
        </div>

        <!-- Availability Schedule -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-list-bullets text-orange-600 text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Availability Schedule</h2>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex gap-2">
                        <button onclick="setListView('table')" id="table-view-btn" class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg transition-colors text-sm font-medium">Table</button>
                        <button onclick="setListView('cards')" id="cards-view-btn" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg transition-colors text-sm font-medium">Cards</button>
                    </div>
                    <button onclick="showBulkUpdate()" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                        <i class="ph-bold ph-pencil mr-2"></i>Bulk Update
                    </button>
                </div>
            </div>
            
            <!-- Filter Controls -->
            <div class="flex items-center gap-4 mb-6 p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center gap-2">
                    <label class="text-sm font-medium text-gray-700">Status:</label>
                    <select id="status-filter" onchange="filterAvailability()" class="px-3 py-1 border border-gray-300 rounded-lg text-sm">
                        <option value="">All</option>
                        <option value="available">Available</option>
                        <option value="limited">Limited</option>
                        <option value="full">Full</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                </div>
                <div class="flex items-center gap-2">
                    <label class="text-sm font-medium text-gray-700">Price Range:</label>
                    <select id="price-filter" onchange="filterAvailability()" class="px-3 py-1 border border-gray-300 rounded-lg text-sm">
                        <option value="">All</option>
                        <option value="0-500">$0 - $500</option>
                        <option value="500-1000">$500 - $1,000</option>
                        <option value="1000-2000">$1,000 - $2,000</option>
                        <option value="2000+">$2,000+</option>
                    </select>
                </div>
                <div class="flex items-center gap-2">
                    <label class="text-sm font-medium text-gray-700">Date Range:</label>
                    <input type="date" id="date-from" onchange="filterAvailability()" class="px-3 py-1 border border-gray-300 rounded-lg text-sm">
                    <span class="text-gray-500">to</span>
                    <input type="date" id="date-to" onchange="filterAvailability()" class="px-3 py-1 border border-gray-300 rounded-lg text-sm">
                </div>
            </div>
            
            <!-- Table View -->
            <div id="table-view" class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Date</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Day</th>
                            <th class="text-center py-3 px-4 text-sm font-semibold text-gray-700">Available Slots</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Price</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Status</th>
                            <th class="text-center py-3 px-4 text-sm font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="availability-list">
                        <!-- Availability rows will be generated here -->
                    </tbody>
                </table>
            </div>
            
            <!-- Cards View (Hidden by default) -->
            <div id="cards-view" class="hidden">
                <div id="availability-cards" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Availability cards will be generated here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Empty State -->
    <div id="empty-state" class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="ph-bold ph-calendar text-gray-400 text-3xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Tour Selected</h3>
        <p class="text-gray-600 mb-6">Select a tour to manage its availability and pricing</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-2xl mx-auto">
            <div class="bg-gray-50 rounded-lg p-4">
                <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="ph-bold ph-calendar-check text-emerald-600"></i>
                </div>
                <h4 class="font-medium text-gray-900 mb-1">Real-time Calendar</h4>
                <p class="text-sm text-gray-600">Interactive calendar with drag-and-drop</p>
            </div>
            <div class="bg-gray-50 rounded-lg p-4">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="ph-bold ph-sliders text-blue-600"></i>
                </div>
                <h4 class="font-medium text-gray-900 mb-1">Dynamic Pricing</h4>
                <p class="text-sm text-gray-600">Seasonal and group-based pricing</p>
            </div>
            <div class="bg-gray-50 rounded-lg p-4">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="ph-bold ph-chart-line text-purple-600"></i>
                </div>
                <h4 class="font-medium text-gray-900 mb-1">Analytics</h4>
                <p class="text-sm text-gray-600">Occupancy and revenue insights</p>
            </div>
        </div>
    </div>
</div>

    
    <!-- Empty State -->
    <div id="empty-state" class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
        <i class="fas fa-calendar-alt text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Tour Selected</h3>
        <p class="text-gray-600 mb-6">Select a tour to manage its availability and pricing</p>
    </div>
</div>

<!-- Advanced Bulk Update Modal -->
<div id="bulk-update-modal" class="hidden fixed inset-0 bg-white/80 backdrop-blur-sm flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-900">Advanced Bulk Update</h3>
            <button onclick="hideBulkUpdate()" class="text-gray-400 hover:text-gray-600">
                <i class="ph-bold ph-x text-xl"></i>
            </button>
        </div>
        
        <div class="space-y-6">
            <!-- Date Range Selection -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Date Range</label>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs text-gray-600 mb-1">Start Date</label>
                        <input type="date" id="bulk-start-date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block text-xs text-gray-600 mb-1">End Date</label>
                        <input type="date" id="bulk-end-date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                </div>
            </div>
            
            <!-- Quick Templates -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Quick Templates</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <button type="button" onclick="applyTemplate('weekend')" class="px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-sm font-medium">
                        🌅 Weekend
                    </button>
                    <button type="button" onclick="applyTemplate('weekday')" class="px-3 py-2 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition-colors text-sm font-medium">
                        📅 Weekday
                    </button>
                    <button type="button" onclick="applyTemplate('holiday')" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors text-sm font-medium">
                        🎉 Holiday
                    </button>
                    <button type="button" onclick="applyTemplate('seasonal')" class="px-3 py-2 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors text-sm font-medium">
                        🌤️ Seasonal
                    </button>
                </div>
            </div>
            
            <!-- Availability Settings -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Available Slots</label>
                    <input type="number" id="bulk-slots" min="0" max="50" value="20" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select id="bulk-status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="available">Available</option>
                        <option value="limited">Limited</option>
                        <option value="full">Full</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                </div>
            </div>
            
            <!-- Pricing Settings -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Price Adjustment</label>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-xs text-gray-600 mb-1">Type</label>
                        <select id="bulk-price-adjustment" onchange="togglePriceAmount()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <option value="0">No Change</option>
                            <option value="increase">Increase %</option>
                            <option value="decrease">Decrease %</option>
                            <option value="set">Set Price</option>
                            <option value="multiply">Multiply</option>
                        </select>
                    </div>
                    <div id="price-amount-container" class="hidden md:col-span-3">
                        <label class="block text-xs text-gray-600 mb-1">Amount</label>
                        <input type="number" id="bulk-price-amount" min="0" step="0.01" placeholder="Amount" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                </div>
            </div>
            
            <!-- Advanced Options -->
            <div class="border-t border-gray-200 pt-4">
                <div class="flex items-center justify-between mb-3">
                    <h4 class="text-sm font-semibold text-gray-700">Advanced Options</h4>
                    <button type="button" onclick="toggleAdvanced()" class="text-sm text-blue-600 hover:text-blue-700">
                        <i class="ph-bold ph-caret-down"></i> Show
                    </button>
                </div>
                <div id="advanced-options" class="hidden space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Min Booking</label>
                            <input type="number" id="bulk-min-booking" min="1" value="1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Max Booking</label>
                            <input type="number" id="bulk-max-booking" min="1" value="50" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                        <textarea id="bulk-notes" rows="2" placeholder="Add notes for this batch update" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"></textarea>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-200">
            <button onclick="hideBulkUpdate()" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-medium">Cancel</button>
            <button onclick="previewBulkUpdate()" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">Preview</button>
            <button onclick="applyBulkUpdate()" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">Apply Changes</button>
        </div>
    </div>
</div>

<!-- Analytics Modal -->
<div id="analytics-modal" class="hidden fixed inset-0 bg-white/80 backdrop-blur-sm flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-900">Pricing Analytics</h3>
            <button onclick="hideAnalytics()" class="text-gray-400 hover:text-gray-600">
                <i class="ph-bold ph-x text-xl"></i>
            </button>
        </div>
        
        <div class="space-y-6">
            <!-- Revenue Chart -->
            <div>
                <h4 class="text-lg font-semibold text-gray-900 mb-4">Revenue Overview</h4>
                <div class="bg-gray-50 rounded-lg p-4 h-64 flex items-center justify-center">
                    <p class="text-gray-500">Chart placeholder - Revenue analytics will be displayed here</p>
                </div>
            </div>
            
            <!-- Occupancy Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-emerald-50 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-900 mb-2">Average Occupancy</h5>
                    <p class="text-2xl font-bold text-emerald-600">75%</p>
                    <p class="text-sm text-gray-600">+5% from last month</p>
                </div>
                <div class="bg-blue-50 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-900 mb-2">Total Revenue</h5>
                    <p class="text-2xl font-bold text-blue-600">$45,230</p>
                    <p class="text-sm text-gray-600">+12% from last month</p>
                </div>
                <div class="bg-purple-50 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-900 mb-2">Avg. Price</h5>
                    <p class="text-2xl font-bold text-purple-600">$1,250</p>
                    <p class="text-sm text-gray-600">+3% from last month</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let currentTourId = null;
let currentMonth = new Date();
let availabilityData = {};
let currentViewMode = 'month';
let currentListView = 'table';

function loadTourAvailability() {
    const selector = document.getElementById('tour-selector');
    currentTourId = selector.value;
    
    if (!currentTourId) {
        document.getElementById('tour-details').classList.add('hidden');
        document.getElementById('empty-state').classList.remove('hidden');
        document.getElementById('stats-dashboard').classList.add('hidden');
        document.getElementById('tour-overview').classList.add('hidden');
        return;
    }

    // Load tour data
    fetch(`/admin/api/tours/${currentTourId}`)
        .then(response => response.json())
        .then(data => {
            // Update tour overview
            document.getElementById('selected-tour-name').textContent = data.name;
            document.getElementById('selected-tour-duration').textContent = data.duration_days + ' days';
            document.getElementById('selected-tour-location').textContent = data.location;
            document.getElementById('selected-tour-price').textContent = '$' + number_format(data.base_price, 0);
            document.getElementById('max-group-size').value = data.max_group_size || 20;
            
            document.getElementById('tour-details').classList.remove('hidden');
            document.getElementById('empty-state').classList.add('hidden');
            document.getElementById('stats-dashboard').classList.remove('hidden');
            document.getElementById('tour-overview').classList.remove('hidden');
            
            // Load availability data
            loadAvailabilityData();
        })
        .catch(error => {
            console.error('Error loading tour:', error);
            showNotification('Error loading tour data', 'error');
        });
}

function loadAvailabilityData() {
    // Simulate loading availability data
    availabilityData = generateMockAvailabilityData();
    generateCalendar();
    generateAvailabilityList();
    updateStatistics();
    const lastDay = new Date(year, month + 1, 0);
    const daysInMonth = lastDay.getDate();
    const startingDayOfWeek = firstDay.getDay();
    
    // Update month display
    document.getElementById('current-month').textContent = 
        firstDay.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
    
    const grid = document.getElementById('calendar-grid');
    grid.innerHTML = '';
    
    // Add empty cells for days before month starts
    for (let i = 0; i < startingDayOfWeek; i++) {
        const emptyCell = document.createElement('div');
        grid.appendChild(emptyCell);
    }
    
    // Add days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        const availability = availabilityData[dateStr] || { available_slots: 20, price: 0, status: 'available' };
        
        const dayCell = document.createElement('div');
        dayCell.className = 'bg-white border border-gray-200 rounded-lg p-2 hover:bg-emerald-50 cursor-pointer transition-colors';
        dayCell.onclick = () => editDateAvailability(dateStr);
        
        let statusColor = 'bg-green-100 text-green-800';
        if (availability.status === 'full') statusColor = 'bg-red-100 text-red-800';
        else if (availability.status === 'limited') statusColor = 'bg-yellow-100 text-yellow-800';
        else if (availability.status === 'unavailable') statusColor = 'bg-gray-100 text-gray-800';
        
        dayCell.innerHTML = `
            <div class="text-center">
                <div class="text-sm font-medium text-gray-900">${day}</div>
                <div class="text-xs text-gray-600">${availability.available_slots || 0}</div>
                <div class="text-xs font-medium ${statusColor} rounded px-1 mt-1">${availability.status || 'available'}</div>
            </div>
        `;
        
        grid.appendChild(dayCell);
    }
}

function generateMockAvailabilityData() {
    const data = {};
    const today = new Date();
    
    for (let i = 0; i < 90; i++) {
        const date = new Date(today);
        date.setDate(today.getDate() + i);
        const dateStr = date.toISOString().split('T')[0];
        
        const randomSlots = Math.floor(Math.random() * 25) + 5;
        const randomPrice = (Math.random() * 500 + 800).toFixed(2);
        const randomStatus = randomSlots > 15 ? 'available' : randomSlots > 5 ? 'limited' : 'full';
        
        data[dateStr] = {
            available_slots: randomSlots,
            price: parseFloat(randomPrice),
            status: randomStatus
        };
    }
    
    return data;
}

function generateCalendar() {
    const year = currentMonth.getFullYear();
    const month = currentMonth.getMonth();
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const daysInMonth = lastDay.getDate();
    const startingDayOfWeek = firstDay.getDay();
    
    // Update month display
    document.getElementById('current-month').textContent = 
        firstDay.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
    
    const grid = document.getElementById('calendar-grid');
    grid.innerHTML = '';
    
    // Add empty cells for days before month starts
    for (let i = 0; i < startingDayOfWeek; i++) {
        const emptyCell = document.createElement('div');
        grid.appendChild(emptyCell);
    }
    
    // Add days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        const availability = availabilityData[dateStr] || { available_slots: 20, price: 0, status: 'available' };
        
        const dayCell = document.createElement('div');
        dayCell.className = 'bg-white border border-gray-200 rounded-lg p-2 hover:bg-emerald-50 cursor-pointer transition-colors relative';
        dayCell.onclick = () => editDateAvailability(dateStr);
        
        let statusColor = 'bg-green-100 text-green-800';
        if (availability.status === 'full') statusColor = 'bg-red-100 text-red-800';
        else if (availability.status === 'limited') statusColor = 'bg-yellow-100 text-yellow-800';
        else if (availability.status === 'unavailable') statusColor = 'bg-gray-100 text-gray-800';
        
        dayCell.innerHTML = `
            <div class="text-center">
                <div class="text-sm font-medium text-gray-900">${day}</div>
                <div class="text-xs text-gray-600">${availability.available_slots || 0} slots</div>
                <div class="text-xs font-medium ${statusColor} rounded px-1 mt-1">${availability.status || 'available'}</div>
                <div class="text-xs text-gray-500 mt-1">$${number_format(availability.price || 0, 0)}</div>
            </div>
        `;
        
        grid.appendChild(dayCell);
    }
}

function generateAvailabilityList() {
    const tbody = document.getElementById('availability-list');
    const cardsContainer = document.getElementById('availability-cards');
    tbody.innerHTML = '';
    cardsContainer.innerHTML = '';
    
    // Generate next 30 days of availability
    const today = new Date();
    for (let i = 0; i < 30; i++) {
        const date = new Date(today);
        date.setDate(today.getDate() + i);
        const dateStr = date.toISOString().split('T')[0];
        const availability = availabilityData[dateStr] || { available_slots: 20, price: 0, status: 'available' };
        
        // Table row
        const row = document.createElement('tr');
        row.className = 'border-b border-gray-100 hover:bg-gray-50';
        row.innerHTML = `
            <td class="py-3 px-4">
                <div class="text-sm font-medium text-gray-900">${date.toLocaleDateString()}</div>
                <div class="text-xs text-gray-600">${date.toLocaleDateString('en-US', { weekday: 'short' })}</div>
            </td>
            <td class="py-3 px-4">
                <input type="number" min="0" max="50" value="${availability.available_slots || 20}" 
                       onchange="updateAvailabilitySlot('${dateStr}', this.value)"
                       class="w-20 px-2 py-1 border border-gray-300 rounded text-sm">
            </td>
            <td class="py-3 px-4">
                <div class="text-sm font-medium text-gray-900">$${number_format(availability.price || 0, 0)}</div>
            </td>
            <td class="py-3 px-4">
                <span class="px-2 py-1 text-xs font-medium rounded-full
                    ${availability.status === 'available' ? 'bg-green-100 text-green-800' : ''}
                    ${availability.status === 'limited' ? 'bg-yellow-100 text-yellow-800' : ''}
                    ${availability.status === 'full' ? 'bg-red-100 text-red-800' : ''}
                    ${availability.status === 'unavailable' ? 'bg-gray-100 text-gray-800' : ''}">
                    ${availability.status || 'available'}
                </span>
            </td>
            <td class="py-3 px-4 text-center">
                <button onclick="editDateAvailability('${dateStr}')" class="text-emerald-600 hover:text-emerald-800 text-sm mr-2">
                    <i class="ph-bold ph-pencil"></i>
                </button>
                <button onclick="copyDateAvailability('${dateStr}')" class="text-blue-600 hover:text-blue-800 text-sm">
                    <i class="ph-bold ph-copy"></i>
                </button>
            </td>
        `;
        tbody.appendChild(row);
        
        // Card
        const card = document.createElement('div');
        card.className = 'bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow';
        card.innerHTML = `
            <div class="flex items-center justify-between mb-3">
                <div>
                    <div class="text-sm font-medium text-gray-900">${date.toLocaleDateString()}</div>
                    <div class="text-xs text-gray-600">${date.toLocaleDateString('en-US', { weekday: 'long' })}</div>
                </div>
                <span class="px-2 py-1 text-xs font-medium rounded-full
                    ${availability.status === 'available' ? 'bg-green-100 text-green-800' : ''}
                    ${availability.status === 'limited' ? 'bg-yellow-100 text-yellow-800' : ''}
                    ${availability.status === 'full' ? 'bg-red-100 text-red-800' : ''}
                    ${availability.status === 'unavailable' ? 'bg-gray-100 text-gray-800' : ''}">
                    ${availability.status || 'available'}
                </span>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-xs text-gray-600">Available Slots</p>
                    <p class="text-lg font-semibold text-gray-900">${availability.available_slots || 20}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-600">Price</p>
                    <p class="text-lg font-semibold text-emerald-600">$${number_format(availability.price || 0, 0)}</p>
                </div>
            </div>
            <div class="flex gap-2 mt-3">
                <button onclick="editDateAvailability('${dateStr}')" class="flex-1 px-3 py-1 bg-emerald-100 text-emerald-700 rounded text-sm hover:bg-emerald-200 transition-colors">
                    Edit
                </button>
                <button onclick="copyDateAvailability('${dateStr}')" class="flex-1 px-3 py-1 bg-blue-100 text-blue-700 rounded text-sm hover:bg-blue-200 transition-colors">
                    Copy
                </button>
            </div>
        `;
        cardsContainer.appendChild(card);
    }
}

function updateAvailabilitySlot(dateStr, slots) {
    if (!availabilityData[dateStr]) {
        availabilityData[dateStr] = {};
    }
    availabilityData[dateStr].available_slots = parseInt(slots);
    
    // Update status based on availability
    if (slots == 0) {
        availabilityData[dateStr].status = 'unavailable';
    } else if (slots < 5) {
        availabilityData[dateStr].status = 'limited';
    } else {
        availabilityData[dateStr].status = 'available';
    }
    
    generateCalendar();
}

function editDateAvailability(dateStr) {
    const availability = availabilityData[dateStr] || { available_slots: 20, price: 0, status: 'available' };
    
    // This would open a modal for detailed editing
    console.log('Edit availability for:', dateStr, availability);
}

function previousMonth() {
    currentMonth.setMonth(currentMonth.getMonth() - 1);
    generateCalendar();
}

function nextMonth() {
    currentMonth.setMonth(currentMonth.getMonth() + 1);
    generateCalendar();
}

function updateSeasonalPricing() {
    const multiplier = parseFloat(document.getElementById('seasonal-multiplier').value);
    // Update pricing based on seasonal multiplier
    console.log('Seasonal multiplier:', multiplier);
}

function updateGroupPricing() {
    const discount = parseInt(document.getElementById('group-discount').value);
    // Update pricing based on group discount
    console.log('Group discount:', discount);
}

function showBulkUpdate() {
    document.getElementById('bulk-update-modal').classList.remove('hidden');
}

function hideBulkUpdate() {
    document.getElementById('bulk-update-modal').classList.add('hidden');
}

function applyBulkUpdate() {
    // Apply bulk update logic
    console.log('Applying bulk update');
    hideBulkUpdate();
}

function exportPricing() {
    // Export pricing data
    console.log('Exporting pricing data');
}

// Helper function for number formatting
function number_format(number, decimals) {
    return number.toLocaleString('en-US', { minimumFractionDigits: decimals, maximumFractionDigits: decimals });
}
</script>
@endsection
